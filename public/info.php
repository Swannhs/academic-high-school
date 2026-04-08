<?php
if (class_exists('Locale')) {
    $reflector = new ReflectionClass('Locale');
    echo "Locale is defined in: " . $reflector->getFileName() . "\n";
    echo "Methods: " . implode(', ', array_map(fn($m) => $m->name, $reflector->getMethods())) . "\n";
} else {
    echo "Locale is NOT defined.\n";
}
?>
