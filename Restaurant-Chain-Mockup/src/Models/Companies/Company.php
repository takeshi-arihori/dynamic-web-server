<?php

namespace Models\Companies;

use Interfaces\FileConvertible;

class Company implements FileConvertible
{
  protected string $name;
  protected int $foundingYear;
  protected string $description;
  protected string $website;
  protected string $phone;
  protected string $industry;
  protected string $ceo;
  protected bool $isPublicTraded;
  protected string $country;
  protected string $founder;
  protected int $totalEmployees;

  public function __construct(
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
    $this->name = $name;
    $this->foundingYear = $foundingYear;
    $this->description = $description;
    $this->website = $website;
    $this->phone = $phone;
    $this->industry = $industry;
    $this->ceo = $ceo;
    $this->isPublicTraded = $isPublicTraded;
    $this->country = $country;
    $this->founder = $founder;
    $this->totalEmployees = $totalEmployees;
  }

  public function toString(): string
  {
    return sprintf(
      "Company Name: %s\nFounding Year: %d\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\nCEO: %s\nPublic Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %d",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPublicTraded ? 'Yes' : 'No',
      $this->country,
      $this->founder,
      $this->totalEmployees
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "<ul>
      <li>Company Name: %s</li>
      <li>Founding Year: %d</li>
      <li>Description: %s</li>
      <li>Website: %s</li>
      <li>Phone: %s</li>
      <li>Industry: %s</li>
      <li>CEO: %s</li>
      <li>Public Traded: %s</li>
      <li>Country: %s</li>
      <li>Founder: %s</li>
      <li>Total Employees: %d</li>
      </ul>",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPublicTraded ? 'Yes' : 'No',
      $this->country,
      $this->founder,
      $this->totalEmployees
    );
  }

  public function toMarkdown(): string
  {
    return "## Company: {$this->name}
                  - Founding Year: {$this->foundingYear}
                  - Description: {$this->description}
                  - Website: {$this->website}
                  - Phone: {$this->phone}
                  - Industry: {$this->industry}
                  - CEO: {$this->ceo}
                  - Public Traded: {$this->isPublicTraded}
                  - Country: {$this->country}
                  - Founder: {$this->founder}
                  - Total Employees: {$this->totalEmployees}";
  }

  public function toArray(): array
  {
    return [
      'name' => $this->name,
      'foundingYear' => $this->foundingYear,
      'description' => $this->description,
      'website' => $this->website,
      'phone' => $this->phone,
      'industry' => $this->industry,
      'ceo' => $this->ceo,
      'isPublicTraded' => $this->isPublicTraded,
      'country' => $this->country,
      'founder' => $this->founder,
      'totalEmployees' => $this->totalEmployees
    ];
  }
}
