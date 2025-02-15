import { createTheme } from '@mui/material'
import { green, blue } from '@mui/material/colors'

const theme = createTheme({
  cssVariables: true,
  palette: {
    mode: 'light',
    primary: {
      light: green[600] + '14',
      main: green[600],
    },
    secondary: {
      main: blue[600],
    },
  },
  components: {
    MuiListItemButton: {
      styleOverrides: {
        root: {
          '&.Mui-selected': {
            backgroundColor: green[600] + '14',
          },
          '&.Mui-selected:hover': {
            backgroundColor: green[600] + '1f',
          },
        },
      },
    },
  },
})

export default theme
