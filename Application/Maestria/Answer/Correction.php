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
                $result['t' . $item] = array_sum($value) / count($value);
            }

            return $result;
        } else {
            return $this->_percentTaxo;
        }
    }

    public function getNoteTaxoAverage()
    {
        return $this->getNoteTaxo(true);
    }

    public function getAppreciation()
    {
        $taxo       = $this->getNoteTaxo();
        $connaitre  = (isset($taxo['t1'])) ? $taxo['t1'] : 0;
        $comprendre = (isset($taxo['t2'])) ? $taxo['t2'] : 0;
        $appliquer  = (isset($taxo['t3'])) ? $taxo['t3'] : 0;
        $analyser   = (isset($taxo['t4'])) ? $taxo['t4'] : 0;

        $commentaire =  $this->commentaire($connaitre, $comprendre, $appliquer, $analyser);

        return utf8_encode($commentaire);
    }


    protected function commentaire($co, $cp, $ap, $an)
    {
        $commentaire = '';
        if ($co < 0.6) {
            $commentaire = 'Tu dois commencer par apprendre les définitions car elles te serviront souvent, ';
            $bon         = 0;
        } else {
            $commentaire = 'Tes définitions sont sues, c\'est bien, ';
            $bon         = 1;
        }
        if ($cp < 0.6) {
            if ($bon == 1) {
                $commentaire .= 'par contre ';
            }

            $commentaire .= 'il faut reformuler les explications pour bien les comprendre et ';
            $bon = 0;
        } else {
            if ($bon == 0) {
                $commentaire .= 'par contre ';
            }

            $commentaire .= 'les explications ont été comprises et ';
            $bon = 1;
        }

        if ($ap < 0.6) {
            if ($bon == 1) {
                $commentaire .= 'néanmoins, ';
            }

            $commentaire .= 'tu peux progresser encore en travaillant davantage les exercices ';
            $bon = 0;
        } else {
            $commentaire .= 'le travail sur les exercices a porté ses fruits ';
        }

        // TODO : Utiliser la Taxo analyse
        return $commentaire;
    }


}