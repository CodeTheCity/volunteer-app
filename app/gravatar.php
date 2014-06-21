<?php

function gravatar_url($email) 
{
	return 'http://www.gravatar.com/avatar/' . md5($email) . '?s=30';
}
