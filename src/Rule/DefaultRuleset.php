<?php

declare(strict_types=1);

/*
 * This file is part of the Composer package "cpsit/php-cs-fixer-config".
 *
 * Copyright (C) 2023 Elias Häußler <e.haeussler@familie-redlich.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

namespace CPSIT\PhpCsFixerConfig\Rule;

use PhpCsFixer\Config;

use function array_replace_recursive;

/**
 * DefaultRuleset.
 *
 * @author Elias Häußler <e.haeussler@familie-redlich.de>
 * @license GPL-3.0-or-later
 */
final class DefaultRuleset implements Ruleset
{
    public function getRules(): array
    {
        return [
            '@PER-CS' => true,
            'global_namespace_import' => [
                'import_classes' => true,
                'import_functions' => true,
            ],
            'ordered_imports' => [
                'imports_order' => [
                    'const',
                    'class',
                    'function',
                ],
            ],
            'trailing_comma_in_multiline' => [
                'elements' => [
                    'arguments',
                    'arrays',
                    'match',
                    'parameters',
                ],
            ],
        ];
    }

    public function apply(Config $config, bool $merge = false): void
    {
        if ($merge) {
            $rules = array_replace_recursive(
                $config->getRules(),
                $this->getRules(),
            );
        } else {
            $rules = $this->getRules();
        }

        $config->setRules($rules);
    }
}
