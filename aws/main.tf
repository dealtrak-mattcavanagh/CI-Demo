provider "aws" {
  profile = "cidemoadmin"
  region = "eu-west-2"
}

resource aws_vpc "app" {
  cidr_block = "10.0.0.0/16"
  tags = {
    Name = "cidemo"
  }
}

resource aws_subnet "app" {
  vpc_id = aws_vpc.app.id
  cidr_block = "10.0.1.0/24"
  tags = {
    Name = "Subnet"
  }
}

resource aws_ecs_cluster "ci" {
  name = "ci-demo"
}

resource aws_ecr_repository "ci" {
  name = "ci-service"
}

data "aws_iam_policy_document" "assume_role" {
  statement {

    actions = ["sts:AssumeRole"]

    principals {
      type        = "Service"
      identifiers = ["ecs-tasks.amazonaws.com"]
    }
  }
}

resource aws_iam_role "ecs_execution_role" {
  name = "ECSExecutionRole"
  assume_role_policy = data.aws_iam_policy_document.assume_role.json
}

data "aws_iam_policy_document" "ecs_execution_policy_document" {
  statement {
    actions = [
      "ecr:GetAuthorizationToken",
      "ecr:BatchCheckLayerAvailability",
      "ecr:GetDownloadUrlForLayer",
      "ecr:BatchGetImage",
      "logs:CreateLogStream",
      "logs:PutLogEvents"
    ]
    sid = "VisualEditor1"
    resources = ["*"]
  }
}

resource aws_iam_policy "ecs_execution_policy" {
  name = "ECSTaskExecutionPolicy"
  policy = data.aws_iam_policy_document.ecs_execution_policy_document.json
}

resource aws_iam_role_policy_attachment "ecs_role_attachment" {
  role = aws_iam_role.ecs_execution_role.name
  policy_arn = aws_iam_policy.ecs_execution_policy.arn
}

resource aws_ecs_task_definition "ci_app" {
  family = "ci-service"
  container_definitions = file("ecs-task-definition.json")
  requires_compatibilities = ["FARGATE"]
  cpu = 256
  memory = 512
  network_mode = "awsvpc"
  execution_role_arn = aws_iam_role.ecs_execution_role.arn
}

resource aws_ecs_service "ci_ecs_service" {
  name = "ci-demo-ecs"
  cluster = aws_ecs_cluster.ci.id
  task_definition = aws_ecs_task_definition.ci_app.id
  launch_type = "FARGATE"
  desired_count = 2
  network_configuration {
    subnets = [aws_subnet.app.id]
    assign_public_ip = true
  }
}
