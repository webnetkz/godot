extends RigidBody2D

var speed = 600
var direction = Vector2()

func _ready():
	self.linear_velocity = direction * speed
