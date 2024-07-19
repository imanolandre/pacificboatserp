<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

/**
 * Class InvoiceController
 * @package App\Http\Controllers
 */
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('client')->get();

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = new Invoice();
        $clients = Client::all()->unique('customer_name');
        return view('invoices.create', compact('invoice', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Invoice::$rules);

        $invoice = Invoice::create($request->all());
        foreach ($request->details as $detail) {
            $invoice->details()->create($detail);
        }

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));

        // Definir el nombre del archivo
        $nombreArchivo = "Invoice-{$invoice->id}-" . Carbon::now()->format('YmdHis') . ".pdf";

        // Guardar el archivo en el almacenamiento
        $pdfPath = "file/{$nombreArchivo}";
        $pdf->save(public_path($pdfPath));

        // Actualizar el campo 'file' con la ruta del archivo PDF
        $invoice->update(['file' => $pdfPath]);

        // Enviar el correo
        Mail::to($invoice->email)->later(Carbon::parse($request->date), new InvoiceMail($invoice, $pdfPath));

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::with('details')->findOrFail($id);
        $clients = Client::all()->unique('customer_name');
        return view('invoices.edit', compact('invoice', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        // Validación
        request()->validate(Invoice::$rules);

        // Actualizar la factura
        $invoice->update($request->all());

        // Eliminar los detalles existentes
        $invoice->details()->delete();

        // Crear los nuevos detalles
        foreach ($request->details as $detail) {
            $invoice->details()->create($detail);
        }

        // Generar y guardar el PDF
        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));
        $nombreArchivo = "Invoice-{$invoice->id}-" . Carbon::now()->format('YmdHis') . ".pdf";
        $pdfPath = "file/{$nombreArchivo}";
        $pdf->save(public_path($pdfPath));
        $invoice->update(['file' => $pdfPath]);

        // Enviar el correo
        Mail::to($invoice->email)->later(Carbon::parse($request->date), new InvoiceMail($invoice, $pdfPath));

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id)->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted successfully');
    }

    public function getClientDetails($id)
    {
        $client = Client::find($id);
        if ($client) {
            return response()->json([
                'yacht_name' => $client->yacht_name,
                'location' => $client->location,
                'email' => $client->email,
            ]);
        }
        return response()->json(['error' => 'Client not found'], 404);
    }

}
