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

namespace CPSIT\PhpCsFixerConfig\Tests\Rule;

use CPSIT\PhpCsFixerConfig as Src;
use PhpCsFixer\Config;
use PHPUnit\Framework;

/**
 * DefaultRulesetTest.
 *
 * @author Elias Häußler <e.haeussler@familie-redlich.de>
 * @license GPL-3.0-or-later
 */
#[Framework\Attributes\CoversClass(Src\Rule\DefaultRuleset::class)]
final class DefaultRulesetTest extends Framework\TestCase
{
    private Src\Rule\DefaultRuleset $subject;
    private Config $config;

    public function setUp(): void
    {
        $this->subject = new Src\Rule\DefaultRuleset();
        $this->config = new Config();
    }

    #[Framework\Attributes\Test]
    public function applyAppliesRulesFromRulesetToGivenConfigObject(): void
    {
        $this->subject->apply($this->config);

        self::assertSame($this->subject->getRules(), $this->config->getRules());
    }

    #[Framework\Attributes\Test]
    public function applyMergesRulesFromRulesetWithRulesFromConfigObject(): void
    {
        $this->config->setRules([
            '@PSR12' => true,
        ]);

        $this->subject->apply($this->config, true);

        $expected = $this->subject->getRules();
        $expected['@PSR12'] = true;

        self::assertEquals($expected, $this->config->getRules());
    }
}
