<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMLqDOKU\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMLqDOKU/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMLqDOKU.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMLqDOKU\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerMLqDOKU\srcApp_KernelDevDebugContainer(array(
    'container.build_hash' => 'MLqDOKU',
    'container.build_id' => 'c7c9ddad',
    'container.build_time' => 1548670873,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerMLqDOKU');
