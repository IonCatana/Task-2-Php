<?php

//Creating the class Path
class Path
{
  public $currentPath;
  
  //__construct is the method name for the constructor
  //Constructor are invoked whenever a new instance of the class is created.
  function __construct($path)
  {
    $this->currentPath = $path;
  }

  // Changes directory of the current path
  public function cd($newPath)
  {
    if ($this->isAbsolutePath($newPath)) {
      $this->currentPath = $newPath;
      return;
    }

    $currentPathLevelCount = substr_count($this->currentPath, '/');
    $parentLevelCount = substr_count($newPath, '..');

    $currentDirs = array_filter(explode('/', $this->currentPath));
    $newDirs = array_filter(explode('/', $newPath), function ($value) {
      return !empty($value) && $value != '..';
    });

    $newPaths = array_slice($currentDirs, 0,  $parentLevelCount > $currentPathLevelCount ? 0 : $currentPathLevelCount - $parentLevelCount);
    array_push($newPaths, ...$newDirs);

    $this->currentPath = '/' . implode('/', $newPaths);
  }

  // For Unix
  public function isAbsolutePath($path)
  {
    return substr($path, 0, 1) == '/';
  }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;
?>