<?php

namespace Models\Companies;

use Interfaces\FileConvertible;

class RestaurantChain extends Company implements FileConvertible
{
  private int $chainId;
  private array $restaurantLocations;
  private string $cuisineType;
  private int $numberOfLocations;
  private string $parentCompany;
  private int $numEmployees;
  private float $salaryMin;
  private float $salaryMax;
  private int $zipMin;
  private int $zipMax;

  public function __construct(
    int $chainId,
    array $restaurantLocations,
    string $cuisineType,
    int $numberOfLocations,
    string $parentCompany,
    string $name,
    int $foundingYear,
    string $description,
    string $website,
    string $phone,
    string $industry,
    string $ceo,
    bool $isPublicTraded,
    string $country,
    string $founder,
    int $totalEmployees
  ) {
    parent::__construct(
      $name,
      $foundingYear,
      $description,
      $website,
      $phone,
      $industry,
      $ceo,
      $isPublicTraded,
      $country,
      $founder,
      $totalEmployees
    );
    $this->chainId = $chainId;
    $this->restaurantLocations = $restaurantLocations;
    $this->cuisineType = $cuisineType;
    $this->numberOfLocations = $numberOfLocations;
    $this->parentCompany = $parentCompany;
  }

  public function addRestaurantLocation($location)
  {
    $this->restaurantLocations[] = $location;
  }

  public function displayAllLocations()
  {
    // Implement method to display all locations
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getParentCompany(): string
  {
    return $this->parentCompany;
  }

  public function setEmployeeRange(int $numEmployees)
  {
    $this->numEmployees = $numEmployees;
  }

  public function setSalaryRange(float $salaryMin, float $salaryMax)
  {
    $this->salaryMin = $salaryMin;
    $this->salaryMax = $salaryMax;
  }

  public function setZipRange(int $zipMin, int $zipMax)
  {
    $this->zipMin = $zipMin;
    $this->zipMax = $zipMax;
  }

  public function toString(): string
  {
    return sprintf(
      "Chain ID: %d\n%s\nCuisine Type: %s\nNumber of Locations: %d\nParent Company: %s",
      $this->chainId,
      parent::toString(),
      $this->cuisineType,
      $this->numberOfLocations,
      $this->parentCompany
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "<ul>
            <li>Chain ID: %d</li>
            %s
            <li>Cuisine Type: %s</li>
            <li>Number of Locations: %d</li>
            <li>Parent Company: %s</li>
            </ul>",
      $this->chainId,
      parent::toHTML(),
      $this->cuisineType,
      $this->numberOfLocations,
      $this->parentCompany
    );
  }

  public function toMarkdown(): string
  {
    return "## Restaurant Chain
                 - Chain ID: {$this->chainId}
                 " . parent::toMarkdown() . "
                 - Cuisine Type: {$this->cuisineType}
                 - Number of Locations: {$this->numberOfLocations}
                 - Parent Company: {$this->parentCompany}";
  }

  public function toArray(): array
  {
    return array_merge(parent::toArray(), [
      'chainId' => $this->chainId,
      'restaurantLocations' => $this->restaurantLocations,
      'cuisineType' => $this->cuisineType,
      'numberOfLocations' => $this->numberOfLocations,
      'parentCompany' => $this->parentCompany
    ]);
  }
}
