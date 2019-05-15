<?php

namespace API\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use API\Mail\sendMail;
use API\Mail\sendMailResetPassword;
use API\User;

class SendMailController extends Controller
{
    public function sendMailApp(Request $request){
       
        $emailOficina = $request->emailOficina;
        Mail::to($emailOficina)->send(new sendMail($request));
        // Mail::to('jvo.marques@gmail.com')->send(new sendMail($request));
    }

    public function sendMailResetPassword(Request $request){
        
        $CaracteresAceitos = 'abcdxywzABCDZYWZ0123456789';
        $maximo = strlen($CaracteresAceitos)-1;
        $senha= null;
        for($i=0; $i < 8; $i++) {
            $senha.= $CaracteresAceitos{mt_rand(0, $maximo)};
        }

        $request->nova_senha = $senha;
        echo $request->nova_senha;

        $emailUsuario = $request->emailUsuario;
        Mail::to($emailUsuario)->send(new sendMailResetPassword($request));

        $user = User::find($request->idUsuario);
        $user->senha = bcrypt($request->nova_senha);
        $user->save();
    }
}
