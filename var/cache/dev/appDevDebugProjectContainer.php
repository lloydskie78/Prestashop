<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerBwbqmne\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerBwbqmne/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerBwbqmne.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerBwbqmne\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerBwbqmne\appDevDebugProjectContainer([
    'container.build_hash' => 'Bwbqmne',
    'container.build_id' => '90ebf392',
    'container.build_time' => 1603865921,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerBwbqmne');
