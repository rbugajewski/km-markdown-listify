#!/usr/bin/php
<?php

//
// md_listify.php
// PHP Script for creating nested enumerated Markdown lists.
//
// Created by Rafael Bugajewski on 05/24/12.
// Copyright (c) 2012, Juicy Cocktail
// All rights reserved.
//
// Redistribution and use in source and binary forms, with or without
// modification, are permitted provided that the following
// conditions are met:
//     * Redistributions of source code must retain the above copyright
//       notice, this list of conditions and the following disclaimer.
//     * Redistributions in binary form must reproduce the above copyright
//       notice, this list of conditions and the following disclaimer in
//       the documentation and/or other materials provided with the
//       distribution.
//     * Neither the name of Juicy Cocktail nor the names of its
//       contributors may be used to endorse or promote products
//       derived from this software without specific prior written
//       permission.
//
// THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
// "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
// LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
// A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL
// BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
// CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
// SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
// INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
// CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
// ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF
// THE POSSIBILITY OF SUCH DAMAGE.

// Change this to your preferred indentation style. Use '\t' for tabs.

$indentation = '  ';


// DO NOT MODIFY BELOW OR ALL KITTEN WILL DIE

if (count($argv) != 2)
{
  die("Usage: ".$argv[0].' "fucking\nlist\n  with\n    indentation"'."\n\n");
}

$list = $argv[1];

function parse_simple_list($list, $indentation)
{
  $result = array();
  $path = array();

  foreach (explode("\n", $list) as $line)
  {
    $depth = 0;
    while (substr($line, 0, strlen($indentation)) === $indentation)
    {
      $depth += 1;
      $line = substr($line, strlen($indentation));
    }

    while ($depth < sizeof($path))
    {
      array_pop($path);
    }

    $path[$depth] = $line;

    $parent =& $result;
    foreach ($path as $depth => $key)
    {
      if (!isset($parent[$key]))
      {
        $parent[$line] = array();
        break;
      }

      $parent =& $parent[$key];
    }
  }

  return $result;
}

function traverse_array($array, $depth)
{
  $prefix = (!$depth)? '': str_repeat("    ", $depth);
  $counter = 0;
  foreach($array as $key=>$value)
  {
    echo $prefix.++$counter.". ".$key."\n";
    if(is_array($value) && count($value))
    {
      traverse_array($value, $depth + 1);
    }
  }
}

$parsed_list = parse_simple_list($list, $indentation);
traverse_array($parsed_list, 0);
