<?php
declare(strict_types=1);

function load_commands(string $jsonPath): array {
  if (!is_file($jsonPath)) {
    return [];
  }
  $json = file_get_contents($jsonPath);
  if ($json === false) {
    return [];
  }
  $data = json_decode($json, true);
  if (!is_array($data)) {
    return [];
  }
  // Normalize minimal required fields
  $normalized = [];
  foreach ($data as $item) {
    if (!isset($item['name'], $item['category'], $item['summary'])) {
      continue;
    }
    $item['description'] = $item['description'] ?? '';
    $item['syntax'] = $item['syntax'] ?? $item['name'];
    $item['options'] = is_array($item['options'] ?? null) ? $item['options'] : [];
    $item['examples'] = is_array($item['examples'] ?? null) ? $item['examples'] : [];
    $item['related'] = is_array($item['related'] ?? null) ? $item['related'] : [];
    $item['requires'] = is_array($item['requires'] ?? null) ? $item['requires'] : [];
    $normalized[] = $item;
  }
  usort($normalized, function ($a, $b) {
    return strcmp(mb_strtolower($a['name']), mb_strtolower($b['name']));
  });
  return $normalized;
}

function extract_categories(array $commands): array {
  $set = [];
  foreach ($commands as $cmd) {
    $cat = (string)$cmd['category'];
    if ($cat !== '') {
      $set[$cat] = true;
    }
  }
  $cats = array_keys($set);
  sort($cats, SORT_NATURAL | SORT_FLAG_CASE);
  return $cats;
}