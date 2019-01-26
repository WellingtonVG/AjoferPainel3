let data1 = "02-2018"
let data2 = "01-2019"

let data1b = data1.split("-")
let data2b = data2.split("-")

let difmes = (parseInt(data2b[1]*12)+parseInt(data2b[0]))-((parseInt(data1b[1]*12)+parseInt(data1b[0])))

let difmem = difmes+1

let datasgraph = []

datasgraph.push(`${parseInt(data1b[0])},${data1b[1]}`)

while (difmes>0) {

    if(data1b[0]==12)
    {
      data1b[1]++
      data1b[0]=1
    }
    else
    {
      data1b[0]++
    }
    datasgraph.push(data1b.toString())
    difmes = difmes-1

  }
  console.log(datasgraph)