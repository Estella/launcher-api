<?php

/*
 * This file is part of Solder.
 *
 * (c) Kyle Klaus <kklaus@indemnity83.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platform\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class BuildResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'minecraft' => $this->getAttribute(config('platform.attributes.build.minecraft')),
            'java' => $this->getAttribute(config('platform.attributes.build.java')),
            'memory' => (int) $this->getAttribute(config('platform.attributes.build.memory')),
            'forge' => $this->getAttribute(config('platform.attributes.build.forge')),
            'mods' => ModResource::collection($this->mods),
        ];
    }
}
