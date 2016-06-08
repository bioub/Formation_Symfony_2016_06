<?php
// Routes

$app->get('/contact', function ($request, $response, $args) {
    return $this->renderer->render($response, 'contact.phtml', $args);
});

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

