
# OpenAI Wrapper for PHP

This repository provides a simple PHP wrapper for interacting with OpenAI's ChatGPT API. It allows you to easily send messages and receive responses from ChatGPT using a structured and reusable class-based approach.

## Features

- **Easy-to-Use**: Simplifies interactions with OpenAI's API.
- **Modular Design**: Includes an `HttpClient` for making HTTP requests and a `ChatGPT` class for interacting with ChatGPT specifically.
- **Error Handling**: Custom `OpenAIException` for handling API errors gracefully.

## Installation

1. **Clone the Repository**:
   Run `git clone https://github.com/Cornholio6969/OpenAI-wrapper-php.git`.

2. **Include in Your Project**:
   Place the `OpenAIWrapper` directory in your project and include it in your PHP files where needed.

## Usage

To use this wrapper, you’ll need an API key from OpenAI. Replace `'your-api-key'` with your actual API key.

### Example

```php
<?php
require_once 'src/OpenAI/ChatGPT.php';
require_once 'src/OpenAI/HttpClient.php';
require_once 'src/OpenAI/Exception/OpenAIException.php';

use OpenAI\ChatGPT;
use OpenAI\HttpClient;

$apiKey = 'your-api-key';
$client = new HttpClient();
$chatGPT = new ChatGPT($client, $apiKey);

try {
    $response = $chatGPT->sendMessage('Hello, ChatGPT!');
    echo $response['content'];
} catch (OpenAI\Exception\OpenAIException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
```

This example demonstrates a simple interaction with the ChatGPT API. The `sendMessage` method sends a message to ChatGPT and returns the response, which can then be displayed or processed further.

## Class Structure

- **`ChatGPT`**: Main class for interacting with OpenAI’s ChatGPT model.
- **`HttpClient`**: Handles HTTP requests and can be shared with other services.
- **`OpenAIException`**: Custom exception for managing API-related errors.

## Contributing

Contributions are welcome! Please fork the repository, make your changes, and submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.