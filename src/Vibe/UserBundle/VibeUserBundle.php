<?php

namespace Vibe\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VibeUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
