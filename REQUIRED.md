
###  [011-rwitech-lemp_1.2.11] 

# -  This should be a list of all the files and directories used or created throughout the deployment process.

#
#  Ubuntu 22.04 x 1 +Vol2 /data0
#  Docker NGINX,BITNAMI/PHP-FPM
#  MySQL 8.1 Native -REQUIRED.md
#

  Main installation launch file: playbook/deployment_install.yml

    ansible.builtin.import_playbook: ubuntu_server_setup.yml
    ansible.builtin.import_playbook: install_mysql.yml
    ansible.builtin.import_playbook: compose.yml

     tasks/create_subnet.yml
     tasks/aws_security_group.yml
     tasks/create_s3_bucket.yml
     tasks/create_volume.yml
     tasks/record_deployment_vars.yml

       vars/deployment_vars.yml
       vars/aws_template_vars.yml
       vars/server_setup_vars.yml
       vars/mysql_vars.yml 
       vars/compose_vars.yml

         lookup('file','../scripts/assume_iam_role.json')
         lookup('file','../scripts/011-rwi-ngx.json')

Additional Resources files/directories


playbook/tasks/configure_mysql.yml:106:        src: "{{ mysql_src_dir }}/{{ db_file }}"
playbook/vars/compose_vars.yml:2:src_dir: ~/dep-1/lemp/docker-files
playbook/vars/mysql_vars.yml:3:mysql_src_dir: /home/eric/dep-1/lemp/mysql
playbook/compose.yml:40:        src: "{{ src_dir }}/create-docker-compose.yml"
playbook/compose.yml:55:        project_src: "{{ nginx_dir }}"
playbook/compose.yml:77:        src: "{{ src_dir }}/default.conf"
playbook/compose.yml:82:        src: "{{ src_dir }}/update-docker-compose.yml"
playbook/compose.yml:87:        src: "{{ src_dir }}/Dockerfile"
playbook/compose.yml:92:        src: "{{ src_dir }}/index.php"
playbook/compose.yml:98:        src: "{{ src_dir }}/.env.php"
playbook/compose.yml:112:        project_src: "{{ nginx_dir }}"

