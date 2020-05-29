<?php
$config=[

       'add_post_rules'=>[
                         [
                          'field' => 'title',
                          'label' => 'Post Title',
                          'rules' => 'required'
                          ],
                          [
                              'field' => 'category',
                              'label' => 'Category Title',
                              'rules' => 'required'
                              ],
                          [
                          'field' => 'description',
                          'label' => 'Post Discription',
                          'rules' => 'required'
                          ]
                     ],
        'add_user_rules'=>[
                        [
                         'field' => 'username',
                         'label' => 'User Name',
                         'rules' => 'required'
                         ],
                         [
                             'field' => 'password',
                             'label' => 'Password',
                             'rules' => 'required'
                             ],
                         [
                         'field' => 'role',
                         'label' => 'Role',
                         'rules' => 'required'
                         ]
                    ],
                    'add_cat_rules'=>[
                        [
                         'field' => 'category_name',
                         'label' => 'Category',
                         'rules' => 'required|is_unique[category.category_name]'
                         ]
                    ],
     

                     

];


?>