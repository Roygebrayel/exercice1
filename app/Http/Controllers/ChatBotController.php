<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatBotController extends Controller
{
    public function sendChat(Request $request)
    {
        // Retrieve the input value from the request
        $input = $request->input('input');

        // Your Gemini API key
        $apiKey = "AIzaSyAsVi8EjXSZ4QlAXSGrPJDl02CyV6a5R_M";

        // Instantiate Guzzle client
        $client = new Client([
            'base_uri' => 'https://generativelanguage.googleapis.com/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'x-goog-api-key' => $apiKey,
            ],
        ]);

        try {
            // Make the API request to generate content
            $response = $client->post('models/gemini-pro:generateContent', [
                'json' => [
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                ['text' => $input]
                            ]
                        ]
                    ]
                ]
            ]);

            // Get the response body
            $responseBody = $response->getBody()->getContents();

            // Decode the response body
            $responseData = json_decode($responseBody, true);

            // Access the generated content
            $generatedContent = $responseData['candidates'][0]['content']['parts'][0]['text'];

            // Return the generated content
            return response()->json($generatedContent);
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., connection errors, invalid response, etc.)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
