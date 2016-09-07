<?php
    class Job
    {
        private $jobTitle;
        private $jobEmployer;
        private $jobStart;
        private $jobEnd;

        function __construct($jobTitle, $jobEmployer, $jobStart, $jobEnd)
        {
            $this->jobTitle = $jobTitle;
            $this->jobEmployer = $jobEmployer;
            $this->jobStart = $jobStart;
            $this->jobEnd = $jobEnd;
        }

        function getJobSummary()
        {
            return $this->jobTitle . ' at ' . $this->jobEmployer . " beginning in " . $this->jobStart . " and ending in " . $this->jobEnd;
        }

        function saveJob()
        {
            array_push($_SESSION['list_of_jobs'], $this);
        }

        static function getJobs()
        {
            return $_SESSION['list_of_jobs'];
        }

        static function deleteJobs()
        {
            $_SESSION['list_of_jobs'] = array();
        }
    }
 ?>
