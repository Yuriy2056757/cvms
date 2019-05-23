<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Articles
Breadcrumbs::for('articles.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Articles', route('articles.index'));
});

// Home > Articles > Create
Breadcrumbs::for('articles.create', function ($trail) {
    $trail->parent('articles.index');
    $trail->push('Create', route('articles.create'));
});

// Home > Articles > [Article]
Breadcrumbs::for('articles.show', function ($trail, $article) {
    $trail->parent('articles.index');
    $trail->push($article->name, route('articles.show', $article));
});

// Home > Articles > [Article] > Edit
Breadcrumbs::for('articles.edit', function ($trail, $article) {
    $trail->parent('articles.show', $article);
    $trail->push('Edit', route('articles.edit', $article));
});

// Home > Articles > [Article] > Experiences > Create
Breadcrumbs::for('articles.experiences.create', function ($trail, $article) {
    $trail->parent('articles.show', $article);
    $trail->push(
        'Add Experience',
        route('articles.experiences.create', $article)
    );
});

// Home > Articles > [Article] > Experiences > [Experience] > Edit
Breadcrumbs::for('articles.experiences.edit', function (
    $trail,
    $article,
    $experience
) {
    $trail->parent('articles.show', $article);
    $trail->push(
        $experience->company . ' - ' . $experience->title,
        route('articles.experiences.edit', [$article, $experience])
    );
});