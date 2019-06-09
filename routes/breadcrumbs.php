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

// Home > Articles > [Article] > Qualifications > Create
Breadcrumbs::for('articles.qualifications.create', function ($trail, $article) {
    $trail->parent('articles.show', $article);
    $trail->push(
        'Add Qualification',
        route('articles.qualifications.create', $article)
    );
});

// Home > Articles > [Article] > Qualifications > [Qualification] > Edit
Breadcrumbs::for('articles.qualifications.edit', function (
    $trail,
    $article,
    $qualification
) {
    $trail->parent('articles.show', $article);
    $trail->push(
        $qualification->title,
        route('articles.qualifications.edit', [$article, $qualification])
    );
});

// Home > Articles > [Article] > Skills > Create
Breadcrumbs::for('articles.skills.create', function ($trail, $article) {
    $trail->parent('articles.show', $article);
    $trail->push(
        'Add Skill',
        route('articles.skills.create', $article)
    );
});

// Home > Articles > [Article] > Skills > [Skill] > Edit
Breadcrumbs::for('articles.skills.edit', function (
    $trail,
    $article,
    $skill
) {
    $trail->parent('articles.show', $article);
    $trail->push(
        $skill->title,
        route('articles.skills.edit', [$article, $skill])
    );
});

// Home > Articles > [Article] > Contact Info > Create
Breadcrumbs::for('articles.contact_infos.create', function ($trail, $article) {
    $trail->parent('articles.show', $article);
    $trail->push(
        'Add Contact Info',
        route('articles.contact_infos.create', $article)
    );
});

// Home > Articles > [Article] > Contact Info > [ContactInfo] > Edit
Breadcrumbs::for('articles.contact_infos.edit', function (
    $trail,
    $article,
    $contactInfo
) {
    $trail->parent('articles.show', $article);
    $trail->push(
        $contactInfo->title,
        route('articles.contact_infos.edit', [$article, $contactInfo])
    );
});