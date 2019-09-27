
provider "aws" {
  profile = "cidemoadmin"
  region = "eu-west-2"
}

resource aws_ecs_cluster "ci" {
  name = "ci-demo"
}

resource aws_ecr_repository "ci" {
  name = "ci-demo"
}

resource aws_ecs_task_definition "ci_app" {
  family = "ci-task-def"
  container_definitions = file("ecs-task-definition.json")

  volume {
    name = "ci-app-storage"
  }
}

resource aws_ecs_service "ci_ecs_service" {
  name = "ci-demo-ecs"
  cluster = aws_ecs_cluster.ci.id
  task_definition = aws_ecs_task_definition.ci_app.id
}
