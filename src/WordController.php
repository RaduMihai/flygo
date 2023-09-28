<?php

class WordController
{

    /**
     * @var WordProvider
     */
    private WordProvider $wordProvider;

    public function __construct(WordProvider $wordProvider)
    {
        $this->wordProvider = $wordProvider;
    }

    /**
     * @param string $method
     * @param string|null $date
     * @return void
     * @throws Exception
     */
    public function processRequest(string $method, ?string $date): void
    {
        if ($date) {
            $this->processResourceRequest($method, $date);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    /**
     * @throws Exception
     */
    private function processResourceRequest(string $method, string $date): void
    {
        if (!$this->validateDate($date)) {
            throw new Exception('Input provided is not a valid date', 403);
        }

        $words = $this->wordProvider->get($date);

        if (empty($words)) {
            throw new Exception('Words not found for the specified date', 404);
        }

        switch ($method) {
            case "GET":
                echo json_encode($words);
                break;
            default:
                http_response_code(405);
                header("Allow: GET");
        }
    }

    /**
     * @param string $method
     * @return void
     */
    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode($this->wordProvider->getAll());
                break;
            default:
                http_response_code(405);
                header("Allow: GET");
        }
    }

    /**
     * @param string $date
     * @return bool
     */
    private function validateDate(string $date): bool
    {
        if (DateTime::createFromFormat('Y-m-d', $date) !== false) {
            return true;
        }
        return false;
    }
}