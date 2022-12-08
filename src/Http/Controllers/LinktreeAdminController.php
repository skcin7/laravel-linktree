<?php

namespace Skcin7\LaravelLinktree\Http\Controllers;

use Skcin7\LaravelLinktree\Models\Group;
use Skcin7\LaravelLinktree\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Session;
use Linktree;

class LinktreeAdminController extends Controller
{
    public function admin(Request $request)
    {
        if($request->isMethod('POST')) {
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'description' => [
                    'nullable',
                    'string',
                    'max:255',
                ],
                'avatar_url' => [
                    'nullable',
                    'string',
                    'max:255',
                ],
            ]);

            Linktree::setSetting('name', $request->input('name'));
            Linktree::setSetting('description', $request->input('description'));
            Linktree::setSetting('avatar_url', $request->input('avatar_url'));
            Linktree::saveSettings();


            return redirect()->route('linktree.admin')
                ->with('flash_message', [
                    'message' => 'Linktree settings successfully saved.',
                    'type' => 'success',
                ]);

        }

        return view('linktree::admin', [
            //
        ]);
    }



    private function validateGroupInput(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'priority' => [
                'required',
                'integer',
                'min:0',
                'max:10',
            ],
        ]);
    }


    private function createOrUpdateGroupFromInput(Group $group, Request $request)
    {
        $group->setAttribute('name', (string)$request->input('name'));
        $group->setAttribute('description', (string)$request->input('description'));
        $group->setAttribute('priority', (int)$request->input('priority'));
        $group->save();
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function createGroup(Request $request): RedirectResponse
    {
        $this->validateGroupInput($request);
        $group = new Group();
        $this->createOrUpdateGroupFromInput($group, $request);

        return redirect()->route('linktree.admin')
            ->with('flash_message', [
                'message' => 'Group successfully created.',
                'type' => 'success',
            ]);
    }

    /**
     * @param Request $request
     * @param int $groupId
     * @return RedirectResponse
     */
    public function updateGroup(Request $request, int $groupId): RedirectResponse
    {
        $this->validateGroupInput($request);
        $group = Group::where('id', $groupId)->firstOrFail();
        $this->createOrUpdateGroupFromInput($group, $request);

//        session()->flash('flash_message', [
//            'message' => 'Group successfully updated.',
//            'type' => 'success',
//        ]);


        return redirect()->route('linktree.admin')
            ->with('flash_message', [
                'message' => 'Group successfully updated.',
                'type' => 'success',
            ]);
    }

    /**
     * @param Request $request
     * @param int $groupId
     * @return RedirectResponse
     */
    public function deleteGroup(Request $request, int $groupId): RedirectResponse
    {
        $group = Group::where('id', $groupId)->firstOrFail();

        if($group->links->count() > 0) {
            return redirect()->route('linktree.admin')
                ->with('flash_message', [
                    'message' => 'Group not deleted. First delete all the links in it so that it is empty, then you can delete it.',
                    'type' => 'danger',
                ]);
        }

        $group->delete();

        return redirect()->route('linktree.admin')
            ->with('flash_message', [
                'message' => 'Group successfully deleted.',
                'type' => 'success',
            ]);
    }






    private function validateLinkInput(Request $request)
    {
        $request->validate([
            'group_id' => [
                'required',
                'exists:linktree_groups,id',
            ],
            'name' => [
                'required',
                'string',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'href' => [
                'required',
                'string',
            ],
            'is_hidden' => [
                'required',
                'boolean',
            ],
        ]);
    }


    private function createOrUpdateLinkFromInput(Link $link, Request $request)
    {
        $link->group()->associate(Group::find($request->input('group_id')));
        $link->setAttribute('name', (string)$request->input('name'));
        $link->setAttribute('description', (string)$request->input('description'));
        $link->setAttribute('href', (string)$request->input('href'));
        $link->setAttribute('is_hidden', (bool)$request->input('is_hidden'));
        $link->save();
    }


    public function createLink(Request $request): RedirectResponse
    {
        try {
            $this->validateLinkInput($request);
            $link = new Link();
            $this->createOrUpdateLinkFromInput($link, $request);
        }
        catch(\Exception $ex) {
            dd($ex->getMessage());
        }

        return redirect()->route('linktree.admin')
            ->with('flash_message', [
                'message' => 'Link successfully created.',
                'type' => 'success',
            ]);
    }

    public function updateLink(Request $request, int $linkId)
    {
        $this->validateLinkInput($request);
        $link = Link::where('id', $linkId)->firstOrFail();
        $this->createOrUpdateLinkFromInput($link, $request);

        return redirect()->route('linktree.admin')
            ->with('flash_message', [
                'message' => 'Link successfully updated.',
                'type' => 'success',
            ]);
    }

    public function deleteLink(Request $request, int $linkId)
    {
        $link = Link::where('id', $linkId)->firstOrFail();
        $link->delete();

        return redirect()->route('linktree.admin')
            ->with('flash_message', [
                'message' => 'Link successfully deleted.',
                'type' => 'success',
            ]);
    }


}
