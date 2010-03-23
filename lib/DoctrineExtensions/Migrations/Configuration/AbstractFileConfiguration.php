<?php
/*
 *  $Id$
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
*/

namespace DoctrineExtensions\Migrations\Configuration;

use DoctrineExtensions\Migrations\MigrationsException;

/**
 * Abstract Migration Configuration class for loading configuration information
 * from a configuration file (xml or yml).
 *
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link        www.doctrine-project.org
 * @since       2.0
 * @version     $Revision$
 * @author      Jonathan H. Wage <jonwage@gmail.com>
 */
abstract class AbstractFileConfiguration extends Configuration
{
    /** Whether or not the configuration file has been loaded yet or not */
    private $_loaded = false;

    /**
     * Load the information from the passed configuration file
     *
     * @param string $file  The path to the configuration file
     * @return void
     * @throws MigrationException $exception Throws exception if configuration file was already loaded
     */
    public function load($file)
    {
        if ($this->_loaded) {
            throw MigrationsException::configurationFileAlreadyLoaded();
        }
        $this->_load($file);
        $this->_loaded = true;
    }

    /**
     * Abstract method that each file configuration driver must implement to
     * load the given configuration file whether it be xml, yaml, etc. or something
     * else.
     *
     * @param string $file 
     * @return void
     */
    abstract protected function _load($file);
}