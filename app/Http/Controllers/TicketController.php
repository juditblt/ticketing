<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.index', [
            'tickets' => Ticket::all(),
        ]);
    }

    public function show(Request $request, $id){
        $ticket = Ticket::find($id);
        if ($ticket == null){
            $request->session()->flash('alert-warning', 'A hibajegy nem található!');
            return redirect()->back();
        }
        /*
        return view('ticket.show', [
            'ticket' => $ticket
        ]);
        */
        return view('ticket.show', compact('ticket'));
    }

    public function delete(Request $request, $id){
        $ticket = Ticket::find($id);
        if ($ticket == null){
            $request->session()->flash('alert-warning', 'A hibajegy nem található!');
            //return redirect()->route('ticket.index');
            return redirect()->back();
        }
        $ticket->delete();
        $request->session()->flash('alert-success', 'A hibajegy törlésre került!');
        return redirect()->route('ticket.index');
    }

    public function create(){
        return view('ticket.createform');
    }

    public function store(CreateTicketRequest $request){
        $ticket = new Ticket();

        $ticket->user_id = 1;
        $ticket->status = "received";

        $ticket->category_id = $request->category_id;
        $ticket->priority = $request->priority;
        $ticket->description = $request->description;

        $ticket->save();

        $request->session()->flash('alert-success', 'Létrehozás sikeres! S');
        //$request->session()->flash('alert-warning', 'Létrehozás sikeres! W');
        //$request->session()->flash('alert-danger', 'Létrehozás sikeres! D');
        //$request->session()->flash('alert-info', 'Létrehozás sikeres! I');

        return redirect()->route('ticket.index'); //Route nevével átírányítás
    }

    public function home(Request $request){
        echo '<pre>';
        //var_dump($request->session());
        //var_dump($request->session()->get('email'));
        //var_dump($request->session()->get());
        //var_dump($request->session()->all());
        echo '</pre>';

        $messages = array();
        $messages[] = ['text' =>'Nem működik az oldal!', 'danger'];
        $messages[] = ['text' =>'De közeledünk hozzá!', 'info'];

        $tickets = array();
        $tickets[] = ['sender' =>'Pista', 'message' =>'elromlott a macska', 'priority'=>1];
        $tickets[] = ['sender' =>'Anna', 'message' =>'nyikorog az ajtó', 'priority'=>2];
        $tickets[] = ['sender' =>'Zsolt', 'message' =>'kicsi a projektor', 'priority'=>4];
        $tickets[] = ['sender' =>'Iván', 'message' =>'életlen a fejsze', 'priority'=>10];

        return view('ticket.home', [
            'messages' =>$messages,
            'tickets' =>$tickets
        ]);
    }

    public function create_old(Request $request){
        //return $request ->input('name');   // amit beírtunk az inputba
        //return $request -> path();   // ticket/create
        //return $request ->url();  // kiírta a teljes url-t
        //return $request ->method(); // POST
        /*
        echo '<pre>';
        var_dump($request -> all());
        var_dump($request -> collect());
        echo '</pre>';
        */
        /*
        echo '<pre>';
        var_dump($request ->query());
        var_dump($request ->post());
        var_dump($request ->input());
        echo '</pre>';
        */
        /*
        echo '<pre>';

        echo $request ->name;
        echo '<br>';
        echo $request ->email;
        echo '<hr>';

        var_dump($request ->only(['priority', 'text']));
        var_dump($request ->except(['name', 'email']));
        echo '<hr>';

        if ($request ->has('kiskacsa')){
            echo  "VAN";
        }
        else{
            echo "NINCS";
        }
        echo '</pre>';
        */
        if (count(explode(' ', $request->name)) >= 2){
            return "O.K.";
        }
        $request ->session()->put('KULCS', 'Érték');
        $request ->flashExcept('name');
        return redirect()->route('ticket.home');
        /*
        return view('ticket.home', [
            'tickets' => []
        ]);
        */
    }
/*
    public function create(CreateTicketRequest $request){
        var_dump($request->input());
        //var_dump($request->validated());
    }
*/
}
