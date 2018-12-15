import socket,os


host = ""
port = 25003
s = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.bind((host,port))
s.listen(5)
while True:
	conn, addr = s.accept()
	print("connected to :{}".format(addr))
	a = conn.recv(1024)
	print(a.decode('utf8'))
conn.close()
s.close()