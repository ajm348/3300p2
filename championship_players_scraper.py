from urllib2 import urlopen
from bs4 import BeautifulSoup

#url of page you want to parse (in this case, list of all NBA champs)
champions_url='http://www.basketball-reference.com/playoffs/champions.html'
#turn it into "beautiful soup"
champions_soup = BeautifulSoup(urlopen(champions_url), "html.parser")
#find table within page, either by class or id or both
champions_table = champions_soup.find('table', attrs={'class': 'stats_table'})
#http://stackoverflow.com/questions/2010481/how-do-you-get-all-the-rows-from-a-particular-table-using-beautifulsoup
#find all the rows (trs) in the table
champions_rows = champions_table.findChildren(["tr"])
#header row for eventual printing stuff
print "Year,Team,Player,ast,stl,blk,3p%,3pA,2p%,2pA,MP,WS"
for row in champions_rows:
	#cells are all the tds; thus, you can think of a table as a 2d array with rows and cells within the rows
	#beautiful soup turns each of these into an array by virtue of the findChildren command
	cells = row.findChildren('td')
	#some rows don't actually have anything in them; ignore those
	if len(cells) >=3:
		#here I'm using each row to springboard me onto another page (the team page for that year)
		#the href we want is stored in the 3rd cell
		champion_url ='http://www.basketball-reference.com'+cells[2].findChildren('a',href=True)[0]['href']
		#soupifying
		champion_soup = BeautifulSoup(urlopen(champion_url), "html.parser")
		#get the table we care about
		per_game_table = champion_soup.find('table', attrs={'id': 'per_game'})
		advanced_table = champion_soup.find('table', attrs={'id': 'advanced'})
		#get the rows from it
		per_game_rows = per_game_table.findChildren(["tr"])
		advanced_rows = advanced_table.findChildren(["tr"])
		#print out Year,Team,Player,ast,stl,blk,3p%,3pA,2p%,2pA,MP,WS
		#the comma after each print keeps it from printing a new line
		i = 1
		while (i < 6):
			print cells[0].string,",",
			print cells[2].string,",",
			current_player_cells = per_game_rows[i].findChildren("td")
			print current_player_cells[1].string,",",
			print current_player_cells[22].string,",",
			print current_player_cells[23].string,",",
			print current_player_cells[24].string,",",
			print current_player_cells[11].string,",",
			print current_player_cells[10].string,",",
			print current_player_cells[14].string,",",
			print current_player_cells[13].string,",",
			print current_player_cells[5].string,",",
			for each in advanced_rows:
				advanced_cells = each.findChildren("td")
				if len(advanced_cells) > 1:
					if advanced_cells[1].string == current_player_cells[1].string:
						print advanced_cells[20].string
						break
			i+=1

		#interesting player stuff: ast, stl, blk (plus offesnive shooting), MP (take top 5 from per game sheet)

		#Team roster is id roster, but players are alphabetical. they are linked to as /players/[first_initial]/[uptofivelettersoflastname][firsttwolettersoffirstname][0-9][0-9]


