# Terraform: Provisioning a t2.nano EC2 instance

provider "aws" {
  region = var.region
}

resource "aws_security_group" "academic_sg" {
  name        = "academic-portal-sg"
  description = "Allow HTTP and SSH"

  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }
}

resource "aws_instance" "academic_app" {
  ami           = "ami-053b0d53c279acc90" # Ubuntu 22.04 LTS (Update based on region)
  instance_type = "t2.nano"
  key_name      = var.key_name

  vpc_security_group_ids = [aws_security_group.academic_sg.id]

  tags = {
    Name = "Prottasha-Academic-Portal"
  }
}

output "public_ip" {
  value = aws_instance.academic_app.public_ip
}
