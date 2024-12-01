<?php

if (!function_exists('ConditionBadgeClass')) {
  /**
   * Get the CSS class for a badge based on the plant status.
   *
   * @param string $status
   * @return string
   */
  function ConditionBadgeClass($status)
  {
    return match ($status) {
      'sehat' => 'badge-soft-green',
      'baik' => 'badge-soft-primary',
      'layu' => 'badge-soft-warning',
      'sakit' => 'badge-soft-danger',
      default => 'bg-secondary',
    };
  }
}

if (!function_exists('harvestBadgeClass')) {
  /**
   * Get the CSS class for a badge based on the harvest status.
   *
   * @param string $harvestStatus
   * @return string
   */
  function harvestBadgeClass($harvestStatus)
  {
    return match ($harvestStatus) {
      'belum panen' => 'badge-soft-warning',
      'siap panen' => 'badge-soft-primary',
      'sudah dipanen' => 'badge-soft-green',
      default => 'bg-secondary',
    };
  }
}

if (!function_exists('genderBadgeClass')) {
  /**
   * Get the CSS class for a badge based on the harvest status.
   *
   * @param string $gender
   * @return string
   */
  function genderBadgeClass($gender)
  {
    return match ($gender) {
      'laki-laki' => 'badge-soft-blue',
      'perempuan' => 'badge-soft-pink',
      default => 'text-muted',
    };
  }
}
