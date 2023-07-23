<?php

namespace Echo909\ChatgptApi;

use GuzzleHttp\Client;

class ChatgptApi
{
    protected $apiKey;
    
    protected $prompt_template;
    protected $apiUrl = 'https://api.openai.com/v1/chat/completions';

    public function __construct()
    {
        $this->apiKey = config('chatgpt-api.openai_api_key'); 
    }

    public function withTemplate($prompt_template){
       $templates = config('chatgpt-api.templates'); 
      
       if(empty($templates[$prompt_template])){
        throw new \Exception('Prompt template does not exists');
       }
       $this->prompt_template = $templates[$prompt_template];
       return $this;
    }

    public function sendPrompt($prompt)
    {
        $client = new Client();
        if(!empty($this->prompt_template)){
            $prompt = $this->prompt_template.$prompt;
        }
        
        $response = $client->post($this->apiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'json' => [ 
                'model' => 'text-davinci-003',
                'prompt' => $prompt,
                'max_tokens' => 7,
                'temperature'=> 0
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}