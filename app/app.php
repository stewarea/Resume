<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Job.php";

    session_start();

    if (empty($_SESSION['list_of_jobs'])) {
        $_SESSION['list_of_jobs'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('jobs.html.twig', array('jobs' => Job::getJobs()));
    });

    $app->post("/jobs", function() use ($app) {
        $job = new Job($_POST['jobTitle'], $_POST['jobEmployer'], $_POST['jobStart'], $_POST['jobEnd']);
        $job->saveJob();
        return $app['twig']->render('new_job_page.html.twig', array('newjob' => $job));
    });

    $app->post("/clear_jobs", function() use ($app) {
            Job::deleteJobs();
            return $app['twig']->render('jobs.html.twig');
    });

    return $app;
 ?>
