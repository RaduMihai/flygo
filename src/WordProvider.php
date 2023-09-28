<?php

class WordProvider
{
    private array $words = [
        [
            'answer' => 'SNOB',
            'clue' => 'Haughty person',
            'length' => '4',
            'date' => '2023-07-25',
            'direction' => 'across'
        ],
        [
            'answer' => 'PORTER',
            'clue' => 'Luggage carrier at a hotel',
            'length' => '6',
            'date' => '2023-07-25',
            'direction' => 'across'
        ],
        [
            'answer' => 'TUTORS',
            'clue' => 'One-on-one teachers',
            'length' => '6',
            'date' => '2023-07-21',
            'direction' => 'across'
        ]
    ];

    /**
     * @param string $date
     * @return array
     */
    public function get(string $date): array
    {
        $data = [];

        foreach ($this->words as $word)
            if ($word['date'] == $date) {
                $data[] = $word;
            }
        return $data;
    }

    /**
     * @return array|array[]
     */
    public function getAll(): array
    {
        // @toDo to be implemented with proper pagination
        return $this->words;
    }

}











