import bcrypt
import getpass

pass1 = getpass.getpass()
pass2 = getpass.getpass('Verify: ')

if pass1 != pass2:
    print("Passwords not equal")
    exit()

salt = bcrypt.gensalt()
hashed = bcrypt.hashpw(pass1.encode('utf-8'), salt)
print(hashed)