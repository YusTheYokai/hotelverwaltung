<?php

    /**
     * Klasse für das Validieren von Eingaben.
     */
    class Validator {

        private $validateables;
        private $validationResults = [];

        // KONSTRUKTOR

        public function __construct(Validateable ...$validateables) {
            $this->validateables = $validateables;
        }

        // METHODEN

        /**
         * Validiert alle übergebenen Validateables und speichert
         * die Ergebnisse in $validationResults.
         */
        public function validate() {
            foreach ($this->validateables as $validateable) {
                array_push($this->validationResults, $validateable->validate());
            }
        }

        /**
         * Prüft, ob eine Validierung fehlgeschlagen hat.
         */
        public function hasFailed() {
            foreach ($this->validationResults as $validationResult) {
                if ($validationResult->isFailed()) {
                    return TRUE;
                }
            }
            return FALSE;
        }

        /**
         * Generiert die URL-Parameter, welche durch den Toast-Manager
         * in Toasts dargestellt werden können.
         * @return string im Format type0=ERROR&msg0=[FELDNAME]:[FEHLER]&type1=...
         */
        public function generateUrlErrorParams() {
            $counter = 0;
            $urlErrorParams = "";
            foreach ($this->validationResults as $validationResult) {
                foreach ($validationResult->getErrorMessages() as $errorMessage) {
                    $urlErrorParams .= "type$counter=ERROR&msg$counter=" . $validationResult->getAssociativeName() . ":" . $errorMessage . "&";
                    $counter++;
                }
            }
            return $urlErrorParams;
        }
    }

    /**
     * Klasse für das Resultat einer Validierung.
     */
    class ValidationResult {

        private $associativeName;
        private $failed = FALSE;
        private $errorMessages = [];

        // KONSTRUKTOR
        public function __construct($associativeName) {
            $this->associativeName = $associativeName;
        }

        // METHODEN

        /**
         * Fügt eine Fehlermeldung hinzu und setzt das Resultat auf fehlgeschlagen.
         * @param string $errorMessage Key für das Übersetzen der Fehlermeldung
         */
        public function addErrorMessage($errorMessage) {
            $this->failed = TRUE;
            array_push($this->errorMessages, $errorMessage);
        }

        // GETTER

        public function getAssociativeName() {
            return $this->associativeName;
        }

        public function isFailed() {
            return $this->failed;
        }

        public function getErrorMessages() {
            return $this->errorMessages;
        }
    }

    /**
     * Abstrakte Klasse für validierbare Felder.
     */
    abstract class Validateable {

        protected $associativeName;
        protected $associativeArray;
        protected $validationResult;

        // KONSTRUKTOR

        public function __construct($associativeName, $associativeArray) {
            $this->associativeName = $associativeName;
            $this->associativeArray = $associativeArray;
            $this->validationResult = new ValidationResult($associativeName);
        }

        // METHODEN

        /**
         * Validiert das anhand des Names sowie assoziierten Array übergebene Feld.
         * @return ValidationResult das Validierungsresultat.
         */
        public abstract function validate();
    }

    /**
     * Validateable für Zahlenfelder.
     */
    class NumberValidateable extends Validateable {

        private $min;
        private $max;

        // KONSTRUKTOR

        public function __construct($associativeName, $associativeArray, $min, $max) {
            parent::__construct($associativeName, $associativeArray);
            $this->min = $min;
            $this->max = $max;
        }

        // METHODEN

        public function validate() {
            if (!isset($this->associativeArray[$this->associativeName])) {
                $this->validationResult->addErrorMessage("EMPTY");
                return $this->validationResult;
            }

            $value = $this->associativeArray[$this->associativeName];
            if ($value < $this->min) {
                $this->validationResult->addErrorMessage("TOO_SMALL");
            } else if ($value > $this->max) {
                $this->validationResult->addErrorMessage("TOO_BIG");
            }

            return $this->validationResult;
        }
    }

    /**
     * Validateable für Textfelder.
     */
    class TextValidateable extends Validateable {

        private $minLength;
        private $maxLength;

        // KONSTRUKTOR

        public function __construct($associativeName, $associativeArray, $minLength, $maxLength) {
            parent::__construct($associativeName, $associativeArray);
            $this->minLength = $minLength;
            $this->maxLength = $maxLength;
        }

        // METHODEN

        public function validate() {
            if (!isset($this->associativeArray[$this->associativeName])) {
                $this->validationResult->addErrorMessage("EMPTY");
                return $this->validationResult;
            }

            $value = $this->associativeArray[$this->associativeName];
            $length = strlen($value);
            if ($length < $this->minLength) {
                $this->validationResult->addErrorMessage("TOO_SHORT");
            } else if ($length > $this->maxLength) {
                $this->validationResult->addErrorMessage("TOO_LONG");
            }

            return $this->validationResult;
        }
    }

    class EmailValidateable extends TextValidateable {

        public function validate() {
            parent::validate();
            if (!filter_var($this->associativeArray[$this->associativeName], FILTER_VALIDATE_EMAIL)) {
                $this->validationResult->addErrorMessage("INVALID_EMAIL");
            }
            return $this->validationResult;
        }
    }
?>
