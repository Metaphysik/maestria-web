<?php
namespace Application\Maestria\Answer;


class Correction
{
    protected $_answers          = [];
    protected $_questions        = [];
    protected $_percentQuestions = [];
    protected $_percentItems     = [];
    protected $_percentTaxo      = [];

    public function setProvider(Provider $provider)
    {
        $this->_answers   = $provider->getAnswers();
        $this->_questions = $provider->getQuestions();
    }

    public function getNoteQuestions()
    {
        /**
         * @var $question \Application\Entities\Question
         */
        foreach ($this->_questions as $question) {
            $point = $question->getPoint();

            if (isset($this->_answers[$question->getId()]) === false) {
                $this->_answers[$question->getId()] = -1;
            }

            if (isset($this->_answers[$question->getId()]) === true) {
                switch ($this->_answers[$question->getId()]) {
                    case 2:
                        break;
                    case 1:
                        $point = $point / 2;
                        break;
                    case 0:
                    case -1:
                        $point = 0;
                }

                // Stockage
                $this->_percentQuestions[$question->getId()] = $point;

            }
        }
    }

    public function getGlobalNote()
    {
        $total = 0;
        /**
         * @var $question \Application\Entities\Question
         */
        foreach ($this->_questions as $question) {
            $total += $question->getPoint();
        }

        return $total;
    }

    public function getNote()
    {
        if (empty($this->_percentQuestions) === true) {
            $this->getNoteQuestions();
        }

        $note = array_sum($this->_percentQuestions);

        return $note;
    }

    public function getSuccessRate()
    {
        $note      = $this->getNote();
        $totalNote = $this->getGlobalNote();

        return ($note * 100 / $totalNote);
    }

    public function getNoteItem()
    {
        if (empty($this->_percentQuestions) === true) {
            $this->getNoteQuestions();
        }

        /**
         * @var $question \Application\Entities\Question
         */
        foreach ($this->_questions as $question) {
            $point = $question->getPoint();
            if ($point > 0) {
                $note    = $this->_percentQuestions[$question->getId()];
                $percent = $note * 100 / $point;

                // Stockage
                $this->_percentItems[$question->getItem1id()][] = $percent;
                $this->_percentItems[$question->getItem2id()][] = $percent;
            }
        }

        $result = [];
        foreach ($this->_percentItems as $item => $value) {
            $result[$item] = array_sum($value) / count($value);
        }

        return $result;

    }

    public function getNoteTaxo($moyenne = false)
    {
        if (empty($this->_percentQuestions) === true) {
            $this->getNoteQuestions();
        }

        /**
         * @var $question \Application\Entities\Question
         */
        foreach ($this->_questions as $question) {
            $point = $question->getPoint();
            if ($point > 0) {
                $note    = $this->_percentQuestions[$question->getId()];
                $percent = $note * 100 / $point;

                // Stockage
                $this->_percentTaxo[$question->getTaxo()][] = $percent;
            }
        }

        if ($moyenne === true) {
            $result = [];
            foreach ($this->_percentTaxo as $item => $value) {
                $result[$item] = array_sum($value) / count($value);
            }

            return $result;
        } else {
            return $this->_percentTaxo;
        }
    }


}