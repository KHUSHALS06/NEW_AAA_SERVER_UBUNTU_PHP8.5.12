<?php
App::uses('AppController', 'Controller');

class MarqueeImagesController extends AppController
{
    public $uses = array('MarqueeImage');

    public function manage()
    {
        $images = $this->MarqueeImage->find('all', array(
            'order' => array('MarqueeImage.id DESC')
        ));

        $global = $this->MarqueeImage->find('first', array(
            'conditions' => array('is_global' => 1)
        ));

        $this->set(compact('images', 'global'));
    }

    public function saveGlobal()
    {
        if ($this->request->is('post')) {

            $this->MarqueeImage->id = $this->request->data['MarqueeImage']['id'];

            $this->MarqueeImage->save(array(
                'marquee_text' => $this->request->data['MarqueeImage']['marquee_text'],
                'text_color'   => $this->request->data['MarqueeImage']['text_color']
            ));
        }

        return $this->redirect(array('action' => 'manage'));
    }

    public function toggleGlobal($id)
    {
        $this->MarqueeImage->id = $id;
        $current = $this->MarqueeImage->field('status');
        $this->MarqueeImage->saveField('status', $current ? 0 : 1);

        return $this->redirect(array('action' => 'manage'));
    }

    public function upload()
    {
        if ($this->request->is('post')) {

            $file = $this->request->data['MarqueeImage']['image'];

            if (!empty($file['name'])) {

                $filename = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/','',$file['name']);
                $path = WWW_ROOT.'uploads'.DS.'marquee'.DS;

                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                move_uploaded_file($file['tmp_name'], $path.$filename);

                $this->MarqueeImage->create();
                $this->MarqueeImage->save(array(
                    'image_name' => $filename,
                    'status'     => 1,
                    'created'    => date('Y-m-d H:i:s'),
                    'is_global'  => 0
                ));
            }
        }

        return $this->redirect(array('action'=>'manage'));
    }

    public function toggleImage($id)
    {
        $img = $this->MarqueeImage->findById($id);

        if ($img && !$img['MarqueeImage']['is_global']) {

            $this->MarqueeImage->id = $id;
            $current = $img['MarqueeImage']['status'];
            $this->MarqueeImage->saveField('status', $current ? 0 : 1);
        }

        return $this->redirect(array('action'=>'manage'));
    }

    public function delete($id)
    {
        $img = $this->MarqueeImage->findById($id);

        if ($img && !$img['MarqueeImage']['is_global']) {

            $file = WWW_ROOT.'uploads'.DS.'marquee'.DS.$img['MarqueeImage']['image_name'];

            if (file_exists($file)) {
                unlink($file);
            }

            $this->MarqueeImage->delete($id);
        }

        return $this->redirect(array('action'=>'manage'));
    }
}
