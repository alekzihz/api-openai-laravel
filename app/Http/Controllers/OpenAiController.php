<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use OpenAI;

class OpenAiController extends Controller
{
    //

    public function chat(Request $request)
    {

        //$message = $request->input('message');
        $message = $request->json()->get('message');
        if (!$message) {
            return response()->json(['message' => 'Please provide a message']);
        }

        $openaiKey = config("openai.api_key");



        try {
            $client = OpenAI::client($openaiKey);

            $resultado = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => 'Hello!'],
                ],
            ]);


            $resultado = $resultado->choices[0]->message->content;
            return response()->json([
                'assistant' => $resultado
            ]);


            //$response = $openai->chat()->message($message)->send();
            //return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()]);
        }

        // return response()->json(['message' => 'Hello OpenAITEST']);
    }
}
