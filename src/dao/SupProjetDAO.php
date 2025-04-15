<?php
public function getAllSupProjets(): array

public function getSupProjetById(string $id_supprojet): ?SupProjet

public function getSupProjetsByProjet(int $id_projet): array

public function getSupProjetsByModulex(int $id_modulex): array

public function addSupProjet(SupProjet $sp): bool

public function deleteSupProjet(string $id_supprojet): bool

public function updateSupProjet(SupProjet $sp): bool
