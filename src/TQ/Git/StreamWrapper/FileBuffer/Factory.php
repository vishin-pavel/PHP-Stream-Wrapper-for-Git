<?php
/*
 * Copyright (C) 2014 by TEQneers GmbH & Co. KG
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Git Stream Wrapper for PHP
 *
 * @category   TQ
 * @package    TQ_Vcs
 * @subpackage Git
 * @copyright  Copyright (C) 2014 by TEQneers GmbH & Co. KG
 */

namespace TQ\Git\StreamWrapper\FileBuffer;
use TQ\Vcs\StreamWrapper\FileBuffer\Factory as VcsFactory;
use TQ\Vcs\StreamWrapper\FileBuffer\Factory\CommitFactory;
use TQ\Git\StreamWrapper\FileBuffer\Factory\DefaultFactory;
use TQ\Vcs\StreamWrapper\FileBuffer\Factory\HeadFileFactory;
use TQ\Git\StreamWrapper\FileBuffer\Factory\LogFactory;

/**
 * Resolves the file stream factory to use on a stream_open call
 *
 * @author     Stefan Gehrig <gehrigteqneers.de>
 * @category   TQ
 * @package    TQ_Vcs
 * @subpackage Git
 * @copyright  Copyright (C) 2014 by TEQneers GmbH & Co. KG
 */
class Factory extends VcsFactory
{
    /**
     * Returns a default factory
     *
     * includes:
     * - CommitFactory
     * - LogFactory
     * - HeadFileFactory
     * - DefaultFactory
     *
     * @return  Factory
     */
    public static function getDefault()
    {
        $factory    = new self();
        $factory->addFactory(new CommitFactory(), 100)
                ->addFactory(new LogFactory(), 90)
                ->addFactory(new HeadFileFactory(), 80)
                ->addFactory(new DefaultFactory(), -100);
        return $factory;
    }
}