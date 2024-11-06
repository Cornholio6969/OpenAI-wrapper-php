<?php

namespace OpenAI;

use OpenAI\Exception\OpenAIException;

class ChatGPT
{
    private $httpClient;
    private $apiKey;

    public function __construct(HttpClient $httpClient, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    /**
     * Send a message to the ChatGPT model
     *
     * @param string $message
     * @param string $model - Optional model specification (default: gpt-3.5-turbo)
     * @param array $options - Optional array of additional parameters for OpenAI API
     * @return array
     * @throws OpenAIException
     */
    public function sendMessage(string $message, string $model = 'gpt-3.5-turbo', array $options = []): array
    {
        $payload = array_merge([
            'model' => $model,
            'messages' => [['role' => 'user', 'content' => $message]],
        ], $options);

        $headers = [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json'
        ];

        $response = $this->httpClient->post('https://api.openai.com/v1/chat/completions', $payload, $headers);

        if (isset($response['error'])) {
            throw new OpenAIException($response['error']['message']);
        }

        return $response['choices'][0]['message'];
    }
}
