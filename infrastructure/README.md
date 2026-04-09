# Infrastructure as Code (IaC) Deployment

This directory contains scripts to provision and configure your AWS environment using Terraform and Ansible.

## 1. Provisioning (Terraform)
Navigate to `terraform/`:
```bash
terraform init
terraform apply -var="key_name=your-key-name"
```
Take note of the `public_ip` output.

## 2. Configuration (Ansible)
Update `ansible/inventory.ini` with your EC2 IP.
Then run:
```bash
ansible-playbook -i inventory.ini playbook.yml --extra-vars "github_username=your-username"
```

## Cost Optimization (t2.nano)
We are using the `t2.nano` instance type, which is the cheapest general-purpose instance on AWS, ideal for this preview portal.
