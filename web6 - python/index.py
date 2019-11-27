#!python
print("content-type: text/html\n")
import cgi, os, view, html_sanitizer
sanitizer = html_sanitizer.Sanitizer()
form = cgi.FieldStorage()
if 'id' in form:
    title = pageId = form["id"].value
    title = sanitizer.sanitize(title)
    description = open('data/' + pageId, 'r').read()
    description = sanitizer.sanitize(description)
    update_link = '<a href="update.py?id={pageId}">update</a>'.format(pageId=pageId)
    delete_action = '''
        <form action="delete_process.py" method="post">
            <input type="hidden" name="pageId" value="{pageId}">
            <input type="submit" value="delete">
        </form>
    '''.format(pageId=pageId)
else:
    title = pageId = 'Welcome'
    description = 'Hello, web'
    update_link = ''
    delete_action = ''
print('''
<!DOCTYPE html>
<html>
    <head>
        <title>WEB2 - Python</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1><a href="index.py">Python</a></h1>
        <ol>
            {lists}
        </ol>
        <a href="create.py">create</a>
        {update_link}
        {delete_action}
        <h2>
            {title}
        </h2>
        <p>
            {desc}
        </p>
    </body>
</html>
'''.format(lists=view.getList(), title=title, desc=description, update_link=update_link, delete_action=delete_action))
