<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMp1HWL6\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMp1HWL6/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMp1HWL6.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMp1HWL6\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerMp1HWL6\App_KernelDevDebugContainer([
    'container.build_hash' => 'Mp1HWL6',
    'container.build_id' => '5533c889',
    'container.build_time' => 1731839681,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMp1HWL6');
