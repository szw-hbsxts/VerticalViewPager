# _*_ coding：utf-8 _*_

import os
import yt

b = "<h1>我安静大家好巴适！！</h1>"

print(b,end='')

tr = os.getcwd()
images = '\\images\\'
url = tr + images
# print(tr,end='<br />')
re = os.listdir(url)
# print(re,end='<br />')
for nam in re:
    yy = os.listdir(url + nam)
    # print(yy,end='<br />')

    if len(yy) > 1:
        print("测试",end='<br />')
        for uy in yy:
            # print(uy,end='\n')
            wj = os.listdir(url + nam + '\\' + uy + '\\')
            # print(wj,end='\n')
            for nuy in wj:
                trrr = os.listdir(url + nam + '\\' + uy + '\\' + nuy)
                # print(trrr,end='\n')
                tf = yt.gfd(nuy,trrr,uy,nam)
                print(tf)
               
    else:
        os.listdir(url + nam + uy[0])



