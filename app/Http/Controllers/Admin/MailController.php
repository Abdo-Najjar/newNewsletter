<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MailComponentsDataTable;
use App\DataTables\MailDataTable;
use App\Mail;
use App\Http\Requests\Mail\StoreRequest;
use App\Http\Requests\Mail\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Type;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MailDataTable $mailDataTable)
    {


        $title = "Liste des Mails";

        return $mailDataTable->render('dashboard.admin.cruds.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mail $mail)
    {
        $title = "Construire un mail";

        $newsletters = Newsletter::all();

        if ($newsletters->isEmpty()) {


            $this->flashErrorMessage('Il faut ajouter une newsletter');

            return redirect()->route('newsletters.create');
        }

        return view('dashboard.admin.cruds.mail.create', compact('title', 'newsletters', 'mail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $mail = Mail::create($request->all());

        $this->flashCreatedSuccessfully();

        return redirect($mail->path());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {

        //load the  newsletter relationship
        $mail->load('newsletter');

        $title = "Mail";

        // dd($mail);
        return view('dashboard.admin.cruds.mail.show', compact('mail', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        $title = "Modifier un mail";

        $newsletters = Newsletter::all();

        return view('dashboard.admin.cruds.mail.edit', compact('mail', 'title', 'newsletters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Mail $mail)
    {
        $mail->update($request->all());

        $this->flashUpdatedSuccessfully();

        return redirect($mail->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        $mail->delete();

        $this->flashDeletedSuccessfully();

        return redirect()->back();
    }


    public function component(Mail $mail, MailComponentsDataTable $mailComponentsDataTable)
    {

        $title = "Ajouter un composant";

        return $mailComponentsDataTable->setMailId($mail->id)->render('dashboard.admin.cruds.mail.component', compact('mail', 'title'));
    }


    public function storeComponentTitle(Mail $mail)
    {

        $data = request()->validate([
            'content' => 'required|string|max:191',
            'type_id' => 'numeric|exists:types,id'

        ]);

        $mail->components()->create($data);


        return response()->json(['message' => 'un composant est créé avec succès']);
    }

    public function storeComponentButton(Mail $mail)
    {

        $data = request()->validate([
            'content' => 'required|url|max:191',
            'type_id' => 'numeric|exists:types,id'
        ]);


        $mail->components()->create($data);

        return response()->json(['message' => 'un composant est créé avec succès']);
    }

    public function storeComponentText(Mail $mail)
    {

        $data = request()->validate([
            'content' => 'required|string',
            'type_id' => 'numeric|exists:types,id'
        ]);


        $mail->components()->create($data);

        return response()->json(['message' => 'un composant est créé avec succès']);
    }

    public function storeComponentImage(Mail $mail)
    {
        $data = request()->validate([
            'content' => 'required|file|image|max:3000',
            'type_id' => 'numeric|exists:types,id'
        ]);

        if (request()->hasFile('content')) {

            $data['content'] = request()->file('content')->store('components', 'public');
        }


        $mail->components()->create($data);

        return response()->json(['message' => 'un composant est créé avec succès']);
    }

    public function storeComponentlogo(Mail $mail)
    {
        $data = request()->validate([
            'content' => 'required|file|image|max:3000',
            'type_id' => 'numeric|exists:types,id'
        ]);

        if (request()->hasFile('content')) {

            $data['content'] = request()->file('content')->store('components', 'public');
        }


        $mail->components()->create($data);

        return response()->json(['message' => 'un composant est créé avec succès']);
    }
}
